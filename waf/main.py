from flask import Flask, request, Response, render_template
import requests
from waf import check


app = Flask(__name__)

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
            data=request.form.to_dict()
        )
    elif request.method == "GET":
        resp = requests.request(
            method=request.method,
            url=target_url,
            params=request.args.to_dict()
        )
        
    if (resp.status_code == 200):
        # Make sure static content like css and images are served from this reverse-proxy directly.
        response_content = resp.text.replace("/public", "/static/images")
        response_content = response_content.replace("../inc/bootstrap-5.3.3-dist", "/static/bootstrap-5.3.3-dist")
        return Response(response_content, 200)
        
    # Finally, return the response.
    return resp

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)