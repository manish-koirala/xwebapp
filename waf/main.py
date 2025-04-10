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
    resp = requests.request(
        method=request.method,
        url=target_url,
        data=request.get_data(),
    )
    # Make sure static content like css and images are served from this reverse-proxy directly.
    response_content = resp.text.replace("/public", "/static/images")
    response_content = response_content.replace("../inc/bootstrap-5.3.3-dist", "/static/bootstrap-5.3.3-dist")

    # Finally, return the response.
    response = Response(response_content, resp.status_code)
    return response

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)