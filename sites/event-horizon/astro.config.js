// @ts-check
import { defineConfig } from "astro/config";
import { site, eventHorizon } from "@cyberfinity/event-horizon-site-meta";

// https://astro.build/config
export default defineConfig({
  site,

  outDir: eventHorizon.distDir,

  vite: {
    build: {
      emptyOutDir: false,
    },
  },
});
