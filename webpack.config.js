const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    plugins: [
        new CopyPlugin([
            {
                from: 'public/uploads',
                to: 'public/images',
            },
        ]),
    ],
};
