const path = require("path");
var HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
module.exports = {
  entry: {   
    vendor: [
            //"./resources/lib/jquery-1.11.3.min.js",
            //"./resources/lib/bootstrap.min.js",
            "./resources/js/vendor.js"
            ],
    main: "./resources/js/index.js"        
  },
  /*plugins:[
   new HtmlWebpackPlugin({
   	 template: "./resources/view/template.html"
   })
  ],*/
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [
          MiniCssExtractPlugin.loader, //3. Extract css into files
          "css-loader"
        ]
      },

      {
        test: /\.html$/,
        use: [
              "html-loader"
             ]
      },

      {
        test: /\.(svg|png|jpg|gif)$/,
        use: {
          loader: "file-loader",
          options: {
            name: "[name].[hash].[ext]",
            outputPath: "imgs"
          }
        }
      }
    ]
  }
};