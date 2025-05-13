from flask import Flask, request, Response, render_template, send_file
import requests
from waf import check


app = Flask(__name__, static_folder=None)

BACKEND_URL = "http://www:80"

# REVERSE PROXY
@app.route('/', defaults={'path': ''}, methods=["GET", "POST", "PUT", "DELETE"])
@app.route('/<path:path>', methods=["GET", "POST", "PUT", "DELETE"])
def proxy(path):
    # Check with waf rules.
    if check(request):
        return render_template("blocked.html", status_code=403)

    # Otherwise, just proxy the requests.
    target_url = f"{BACKEND_URL}/{path}"
    # Get the response.
    if request.method == "POST":
        resp = requests.request(
            method=request.method,
            url=target_url,
            headers={key: value for key,value in request.headers if key.lower() != 'host'},
            data=request.form.to_dict()
        )
        resp_headers = ['image/png', 'image/jpeg', 'text/plain', 'text/css', 'application/javascript']
        response_mimetype = resp.raw.headers.get('Content-Type')
        if response_mimetype in resp_headers:
            return send_file()
        return Response(resp, resp.status_code)

    elif request.method == "GET":
        resp = requests.request(
            method=request.method,
            url=target_url,
            headers={key: value for key,value in request.headers if key.lower() != 'host'},
            params=request.args.to_dict()
        )
        return Response(resp, resp.status_code)
        
        
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)
