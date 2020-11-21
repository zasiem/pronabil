function response(res, code, message, data = null) {
    const state = {
        'code': code,
        'message': message,
        'data': data,
    }

    const response = res.send(state);
    return response;
}

module.exports = response;