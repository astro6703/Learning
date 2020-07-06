const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    mode: 'none',
    entry: {
        index: './src/pages/index.ts',
        about: './src/pages/about.ts',
        interests: './src/pages/interests.ts',
        learning: './src/pages/learning.ts',
        photos: './src/pages/photos.ts',
        contact: './src/pages/contact.ts',
        test: './src/pages/test.ts',
        history: './src/pages/history.ts'
    },
    module: {
        rules: [
            { test: /\.tsx?$/, loader: 'ts-loader', exclude: /node_modules/ },
            { test: /\.s[ac]ss$/i, use: [ miniCssExtractPlugin.loader, 'css-loader', 'resolve-url-loader', 'sass-loader' ] },
            { test: /\.(png|jpe?g|gif)/i, loader: 'file-loader', options: { name: '[path][name].[ext]', outputPath: 'images' } },
        ],
    },
    resolve: {
        extensions: [ '.ts' ],
    },
    output: {
        path: path.resolve(__dirname, 'bundles'),
        filename: '[name].bundle.js',
    },
    plugins: [
        new miniCssExtractPlugin({ filename: "[name].bundle.css" }),
    ]
};