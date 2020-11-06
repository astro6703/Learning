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
        "home/history": './src/home/history.ts',
        "contact/index": './src/contact/index.ts',
        "contact/success": "./src/contact/success.ts",
        "test/index": "./src/test/index.ts",
        "test/success": "./src/test/success.ts",
        "test/answers": "./src/test/answers.ts",
        "guest-book/index": "./src/guest-book/index.ts",
        "guest-book/import": "./src/guest-book/import.ts",
        "blog/index": "./src/blog/index.ts",
        "blog/post": "./src/blog/post.ts"
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