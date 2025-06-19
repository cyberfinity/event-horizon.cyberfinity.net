// @ts-check
import { defineConfig } from "astro/config";
import { site, eventHorizon } from "@cyberfinity/event-horizon-site-meta";

// https://astro.build/config
export default defineConfig({
  site,

  outDir: eventHorizon.distDir,

  build: {
    format: "preserve",
  },

  vite: {
    build: {
      emptyOutDir: false,
    },
  },
});
