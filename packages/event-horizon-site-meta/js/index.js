import process from "node:process";
import { join } from "node:path";
import { fileURLToPath } from "node:url";
/**
 * @import {type Site, type SubSite} from '../src/types.ts'
 */

const siteDistRoot = fileURLToPath(new URL("../../../dist/", import.meta.url));

/**
 * 
 * @returns {string}
 */
export function site() {
  const siteUrl =
    process.env["CONTEXT"] === "deploy-preview"
      ? (process.env["DEPLOY_PRIME_URL"])
      : "https://event-horizon.cyberfinity.net";

  console.log(`site() is: ${siteUrl}`);

  return siteUrl;
}

/**
 * 
 * @param {string} siteDir 
 * @returns {string} 
 */
function makeCargoBayPath(siteDir) {
  return `/cargo_bay/${siteDir}/`;
}

/**
 * 
 * @param {string} siteDir 
 * @returns {Pick<SubSite, "distDir" | "path">}
 */
function makeSitePaths(siteDir) {
  return {
    distDir: join(siteDistRoot, siteDir),
    path: siteDir,
  };
}

/**
 * @type {Site}
 */
export const eventHorizon = {
  distDir: siteDistRoot,
};

/**
 * @type {SubSite}
 */
export const bcpOutposts = {
  ...makeSitePaths(makeCargoBayPath("bcp_outposts")),
};
