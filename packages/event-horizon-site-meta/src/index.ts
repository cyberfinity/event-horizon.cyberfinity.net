import process from "node:process";
import { join } from "node:path";
import { fileURLToPath } from "node:url";

const siteDistRoot = fileURLToPath(new URL("../../../dist/", import.meta.url));

export function site(): string {
  const siteUrl =
    process.env["CONTEXT"] === "deploy-preview"
      ? (process.env["DEPLOY_PRIME_URL"] as string)
      : "https://event-horizon.cyberfinity.net";

  console.log(`site() is: ${siteUrl}`);

  return siteUrl;
}

function makeCargoBayPath(siteDir: string): string {
  return `/cargo_bay/${siteDir}/`;
}

function makeSitePaths(siteDir: string): Pick<SubSite, "distDir" | "path"> {
  return {
    distDir: join(siteDistRoot, siteDir),
    path: siteDir,
  };
}

export interface Site {
  distDir: string;
}

export interface SubSite extends Site {
  path: string;
}

export const eventHorizon: Site = {
  distDir: siteDistRoot,
};

export const bcpOutposts: SubSite = {
  ...makeSitePaths(makeCargoBayPath("bcp_outposts")),
};
