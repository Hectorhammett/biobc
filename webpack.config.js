const path = require('path');
const webpack = require('webpack');

module.exports = {
    context: path.resolve(__dirname,'src'),
    entry:{
        index: './javascripts/index.js'
    },
    output:{
        path: path.resolve(__dirname,'dist'),
        filename: '[name].bundle.js'
    },
    module:{
        loaders:[
            {
                test: /\.html$/,
                loader: 'raw-loader'
            },
            {
                test: /\.css$/,
                loader: 'style-loader!css-loader'
            },
            {
                test: /\.scss$/,
                loader: 'style-loader!css-loader!sass-loader'
            },
            {
                test: /\.(eot|svg|ttf|woff|woff2|jpeg|jpg)$/,
                loader: 'file-loader?name=public/fonts/[name].[ext]'
            }
        ]
    },
    devServer:{
        contentBase: './src'
    },
    plugins:[
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: 'jquery'
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: false,
            mangle: false
        })
    ]
}