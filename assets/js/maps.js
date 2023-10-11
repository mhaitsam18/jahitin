//Import the below modules using "npm i -save request oauth-1.0a crypto"
const request = require('request')
const OAuth = require('oauth-1.0a')
const crypto = require('crypto') // depenency package for OAuth-1.0a

// Token request function
function generateToken() {
    // #1 Initialize OAuth with your HERE OAuth credentials from the credentials file that you downloaded above
    const oauth = OAuth({
        consumer: {
            key: 'QnX_xiyX3AKUDC0TT51lbA', //Access key
            secret: '-ilYTuW5QQFfPjtBZ46dkQBC2g7v9ZvXqBRlm20S7hphxHvHcSShrzWA2imYFW3PI5kQ61rID4c9lh3liaiSFw', //Secret key
        },
        signature_method: 'HMAC-SHA256',
        hash_function(base_string, key) {
            return crypto
                .createHmac('sha256', key)
                .update(base_string)
                .digest('base64')
        },
    });
    // #2 Building the request object.
    const request_data = {
        url: 'https://account.api.here.com/oauth2/token',
        method: 'POST',
        data: { grant_type: 'client_credentials' },
    };
    // #3 Sending the request to get the access token
    request(
        {
            url: request_data.url,
            method: request_data.method,
            form: request_data.data,
            headers: oauth.toHeader(oauth.authorize(request_data)),
        },
        function (error, response, body) {

            if (response.statusCode == 200) {
                result = JSON.parse(response.body);
                console.log('Token', result);
            }
        }
    );
}

// Calling this function to get the access token

generateToken();
