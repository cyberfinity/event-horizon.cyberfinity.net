// @ts-check
import { defineConfig } from "astro/config";
import { site, bcpOutposts } from "@cyberfinity/event-horizon-site-meta";

console.log("Site is: ", site);

// https://astro.build/config
export default defineConfig({
  site,
  base: bcpOutposts.path,
  outDir: bcpOutposts.distDir,
});
