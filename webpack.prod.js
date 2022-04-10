const common    = require("./webpack.common");
const { merge } = require('webpack-merge');

const MiniCssExtractPlugin   = require("mini-css-extract-plugin");
const WebpackRTLPlugin       = require("webpack-rtl-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const FileManagerPlugin      = require('filemanager-webpack-plugin');
const entryList              = require('./webpack-entry-list.js');

// Delete Common Entries
delete common.entry;

// Get all entries
let allEntries = {};
for ( const entryGroup of Object.keys( entryList ) ) {
  allEntries = { ...allEntries, ...entryList[entryGroup] };
}

const prodConfig = {
  mode: "production", // production | development
  watch: false,
  entry: allEntries,
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../css/[name].min.css",
      minify: true,
    }),
    new WebpackRTLPlugin({
      minify: true,
    }),
    new CleanWebpackPlugin({
      dry: false,
      cleanOnceBeforeBuildPatterns: [ '../css/*.map', '../js/*.map' ],
      dangerouslyAllowCleanPatternsOutsideProject: true,
    }),
    new FileManagerPlugin({
      events: {
        onEnd: [
          {
            copy: [
              { source: './app', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator/app' },
              { source: './assets', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator/assets' },
              { source: './helper', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator/helper' },
              { source: './languages', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator/languages' },
              { source: './vendor', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator/vendor' },
              { source: './view', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator/view' },
              { source: './*.php', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator' },
              { source: './*.txt', destination: './__build/connections-to-directorist-migrator/connections-to-directorist-migrator' },
            ],
          },
          {
            delete: ['./__build/connections-to-directorist-migrator/connections-to-directorist-migrator/assets/src'],
          },
          {
            archive: [
              { source: './__build/connections-to-directorist-migrator', destination: './__build/connections-to-directorist-migrator.zip' },
            ],
          },
          {
            delete: ['./__build/connections-to-directorist-migrator'],
          },
        ],
      },
    }),
    
  ],

  output: {
    filename: "../js/[name].min.js",
  },
};

const devConfig = {
  mode: "development", // production | development
  watch: true,
  entry: allEntries,
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../css/[name].css",
      minify: false,
    }),
    new WebpackRTLPlugin({
      minify: false,
    }),
  ],
  output: {
    filename: "../js/[name].js",
  },

  devtool: 'source-map'
};

let configs = [];

// Development Build
const _devConfig = merge( common, devConfig );
_devConfig.watch = false;
configs.push( _devConfig );

// Production Build
const _prodConfig = merge( common, prodConfig );
configs.push( _prodConfig );

module.exports = configs;