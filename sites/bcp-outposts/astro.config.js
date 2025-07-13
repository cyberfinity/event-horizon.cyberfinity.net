// @ts-check
import { defineConfig } from "astro/config";
import { site, bcpOutposts } from "@cyberfinity/event-horizon-site-meta";

// https://astro.build/config
export default defineConfig({
  site: site(),
  base: bcpOutposts.path,
  outDir: bcpOutposts.distDir,
});
