/// <reference types="astro/client" />
import { base } from "astro:config/client";

const baseWithSlash = base.endsWith("/") ? base : `${base}/`;

export function getSubSiteBaseUrl(astroUrl: URL): URL {
  return new URL(baseWithSlash, astroUrl);
}

export function getSubSiteUrl(astroUrl: URL, relativePath: string): URL {
  return new URL(relativePath, getSubSiteBaseUrl(astroUrl));
}
