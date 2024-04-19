const path = require('path');

// change these paths for each theme
const themedir = 'wp-content/themes/sample';
const srcdir = 'wp-content/themes/sample/src/';

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require("copy-webpack-plugin");
const webpack = require('webpack');
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");

module.exports = {
  entry: {
    'app': [
      path.resolve(srcdir, 'app.js'),
      path.resolve(srcdir, 'app.scss')
    ],
  },
  output: {
    filename: '[name].js',
    path: path.resolve(themedir, 'assets'),
  },
  module: {
    rules: [
      {
        test: /\.(css|sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: false
            },
          },
          'postcss-loader',
          {
            loader: 'resolve-url-loader',
            options: {

            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
            }
          }
        ]
      },
      {
        test: /\.(jpe?g|png|gif)$/i,
        type: "asset",
      },
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
    new CopyPlugin({
      patterns: [
        { from: 'wp-content/themes/sample/src/icons', to: `icons` },
        { from: 'wp-content/themes/sample/src/images', to: `images` },
        // { from: 'wp-content/themes/sample/src/fonts', to: `fonts` },
      ],
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      $j: 'jquery'
    })
  ],
  optimization: {
    minimizer: [
      "...",
      new ImageMinimizerPlugin({
        minimizer: {
          implementation: ImageMinimizerPlugin.imageminMinify,
          options: {
            // Lossless optimization with custom option
            // Feel free to experiment with options for better result for you
            plugins: [
              ["gifsicle", { interlaced: true }],
              ["jpegtran", { progressive: true }],
              ["optipng", { optimizationLevel: 5 }],
            ],
          },
        },
      }),
    ],
  },
}