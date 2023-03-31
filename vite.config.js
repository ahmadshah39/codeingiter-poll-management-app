import { defineConfig, loadEnv } from 'vite'
import path from "path";
import FullReload from 'vite-plugin-full-reload'
export default defineConfig(()=>{
    const env = loadEnv(null, process.cwd());

	return {
		plugins: [FullReload(['app/Views/**/**/**' ], {always:false})],
        base:'',
        root:'./resources',
		build: {
			emptyOutDir: true,
			outDir: path.resolve(`./public/vite/`),
			// assetsDir: env.VITE_BUILD_DIR,
			manifest: true,
            sourcemap:true,
			rollupOptions: {
				input: `./${env.VITE_RESOURCES_DIR}/js/${env.VITE_ENTRY_FILE}`,
                output:{
                    entryFileNames:"js/[name].js",
                    chunkFileNames:"js/chunks/[name].js",
                    assetFileNames:"css/[name].[ext]"
                }
			},
		},

		server: {
			origin: env.VITE_ORIGIN,
			port: env.VITE_PORT,
			strictPort: true,
		},

		resolve: {
			alias: {
				"@": path.resolve(__dirname, `./${env.VITE_RESOURCES_DIR}`),
			},
		},
	};
});