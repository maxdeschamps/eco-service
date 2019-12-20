var Encore = require("@symfony/webpack-encore")
Encore
// the project directory where all compiled assets will be stored
	.setOutputPath("public/build/")

// the public path used by the web server to access the previous directory
	.setPublicPath("/build")

// will create public/build/app.js and public/build/app.css
	.addEntry("app", "./assets/js/app.js")

// allow legacy applications to use $/jQuery as a global variable
	.autoProvidejQuery()

// enable source maps during development
	.enableSourceMaps(!Encore.isProduction())

// empty the outputPath dir before each build
	.cleanupOutputBeforeBuild()

// show OS notifications when builds finish/fail
	.enableBuildNotifications()
// create hashed filenames (e.g. app.abc123.css)
	.enableVersioning(Encore.isProduction())

// allow sass/scss files to be processed
	.enableSassLoader()

// allow css treatment
// Automatically get his config in postcss.config.js file at root
	.enablePostCssLoader()

// Use polling instead of inotify
var config = Encore.getWebpackConfig()

// with NFS wait before build chunks
config.watchOptions.poll = true

module.exports = config

