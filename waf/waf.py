import json
import re
import urllib.parse
import logging

logging.basicConfig(
    filename='xwaff.log',
    level=logging.INFO,
    format='%(asctime)s - %(levelname)s - %(message)s'
)

def check(req):
    # Load the configuration
    with open("config.json") as f:
        config = json.load(f)

    # Get the path and method information.
    current_path = req.path.split("?")[0]
    current_method = req.method
    
    logging.info(f"Current path: {current_path} and current method: {current_method}")

    # Check if path exists in the config or not.
    if current_path in config.keys():
        # If unsupported HTTP method is being used, then reject.
        supported_methods = config[current_path]["methods"]
        if not "*" in supported_methods and current_method not in supported_methods:
            logging.info(f"Current method '{current_method}' not supported for this path '{current_path}'. Rejecting")
            return True
            
        # Blacklisted patterns
        # Only run if pattterns are defined.
        if (config[current_path]["payloads"][current_method]):
            for param_name, blacklisted_patterns in config[current_path]["payloads"][current_method].items():
                param_value = ""
                # First retrieve and normalize the value of parameter
                if current_method == "GET":
                    param_value = normalize(req.args.get(param_name, ""))
                elif current_method == "POST":
                    param_value = normalize(req.form.get(param_name, ""))
                logging.info(f"Provided param-name: {param_name}, value: {param_value}")
                # Then check against the blacklisted patterns, and if blacklisted, return True.
                for pattern in blacklisted_patterns:
                    if re.match(pattern, param_value):
                        logging.info(f"Blacklisted pattern detected: pattern is: {pattern} and the param value is: {param_value}")
                        return True       
                
        # Finally return False, is not blacklisted.
        return False


def normalize(input):
    # URL decode then convert to lowercase
    return urllib.parse.unquote(input).lower()
