
// [定数] webpack の出力オプションを指定します
// 'production' か 'development' を指定
const MODE = 'development';

// ソースマップの利用有無(productionのときはソースマップを利用しない)
const enabledSourceMap = (MODE === 'development');

// プラグイン：スタイルシートを別ファイルで書き出し
const ExtractTextPlugin = require('extract-text-webpack-plugin');

// プラグイン：ブラウザリロード
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const path = require('path');
const webpack = require('webpack');

module.exports = {
	// モード値を production に設定すると最適化された状態で、
	// development に設定するとソースマップ有効でJSファイルが出力される
	mode: MODE,

	// エントリーポイントのjsファイル指定
	entry: {
		path: path.resolve(__dirname, './dev/assets/entrypoint.js'),
	},
	output: {
		// 出力先パスの指定
		path: path.resolve(__dirname, './public/theme/d-qvic/js'),
		publicPath: '/theme/d-qvic/js/',
		// 出力先ファイルの指定
		filename: 'bundle.js'
	},

	module: {
		rules: [
			// JSファイル出力設定
			{
				test: /\.js$/,
				use: [
					{
						loader: 'babel-loader',
						options: {
							presets: [
								['env', { 'modules': false }]
							]
						}
					}
				],
				exclude: /node_modules/,
			},
			
			// SASS取り込み・CSSファイル出力設定
			{
				test: /\.scss/,
				use: ExtractTextPlugin.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
							options: {
								url: false,
								minimize: true,
								sourceMap: true
							}
						},
						{
							loader: 'sass-loader',
							options: {
								sourceMap: true
							}
						}
					]
				})
			},
			
			// htmlファイルを監視対象に
			{
				test: /\.html$/,
				loader: 'file?name=[path][name].[ext]'
			},
		],

	},
	plugins: [
		// jQuery読み込み
		new webpack.ProvidePlugin(
			{
				jQuery: 'jquery',
				$: 'jquery',
				'window.jQuery': 'jquery',
				'window.$': 'jquery',
			}
		),
		
		// スタイルシートを style.css で書き出し
		new ExtractTextPlugin({
			filename: '../css/style.css'
		}),
		
		// ブラウザリロード
		new BrowserSyncPlugin({
			host: 'localhost',
			port: 3001,
			files: ['./public/**/*.html', './dev/assets'],
			server: { baseDir: ['public'] }
		}),
	],
	
	// ソースマップ書き出し
	devtool: 'source-map'
};