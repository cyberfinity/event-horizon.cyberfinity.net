export interface Site {
  distDir: string;
}

export interface SubSite extends Site {
  path: string;
}
