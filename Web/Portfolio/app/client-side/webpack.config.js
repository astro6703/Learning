const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    mode: 'none',
    entry: {
        "layout": './src/shared/layout/layout.ts',
        "home/index": './src/home/index.ts',
        "home/about": './src/home/about.ts',
        "home/interests": './src/home/interests.ts',
        "home/learning": './src/home/learning.ts',
        "home/photos": './src/home/photos.ts',
        "home/test": './src/home/test.ts',
        "home/history": './src/home/history.ts',
        "contact/index": './src/contact/index.ts',
        "contact/contact": "./src/contact/contact.ts"
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