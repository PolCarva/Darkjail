const esbuild = require('esbuild');
const envFilePlugin = require('esbuild-envfile-plugin');

const buildOptions = {
	entryPoints: [
		'./javascript/script.js',
		'./javascript/block-editor.js',
		'./javascript/tailwind-typography-classes.js',
	],
	bundle: true,
	minify: true,
	target: 'esnext',
	outdir: './theme/js',
	outExtension: { '.js': '.min.js' },
	platform: 'browser',
	plugins: [envFilePlugin]
};

async function buildAndWatch() {
	try {
		const context = await esbuild.context(buildOptions)

		if (process.argv.includes('--watch')) {
			context.watch()
			console.log('watching...')
		} else {
			await context.rebuild()
			console.log('build succeeded')
			// end proccess
			process.exit(0)
		}
	} catch (error) {
		console.error('build failed:', error)
		process.exit(1)
	}
}

buildAndWatch()
