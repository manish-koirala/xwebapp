import json
import re

def check(req):
    # Load the configuration
    with open("config.json") as f:
        config = json.load(f)

    # Get the path and method information.
    path = req.path.split("?")[0]
    method = req.method

    # If the URL path is not in config, reject.
    if path not in config:
        return True
    
    # If unsupported HTTP method is being used, then reject.
    if method not in config[path]["methods"]:
        return True
    
    # If for the particular method, the payloads that are being set have the correct patterns, then accept. 
    # Otherwise reject.
    for method, params in config[path]["payloads"].items():
        if method == "GET":
            for param, pattern in params.items():
                arg = req.args.get(param)
                if not arg: # If the get parameter is not provided.
                    return False
                if re.match(config[path]["payloads"]["method"][param], pattern):
                    return True

        elif method == "POST":
            for param, pattern in params.items():
                arg = req.form.get(param)
                if not arg: # If the post parameter is not provided.
                    return False
                if re.match(config[path]["payloads"]["method"][param], pattern):
                    return True



