import process from "node:process";

const robotsTxtProd = `
# Event-Horizon.cyberfinity.net's robots.txt file

User-agent: *
Disallow: /new/
Disallow: /uni/o2/old/
Disallow: /uni/spacemonkeys/
Disallow: /uni/ganesha/docs/javadoc/
Disallow: /uni/ganesha/docs/presentation.pdf
Disallow: /uni/ganesha/docs/progress.pdf
Disallow: /uni/ganesha/docs/report/report.pdf
Disallow: /wap/gfx2/
`;

const robotsTextDev = `
# Event-Horizon.cyberfinity.net's robots.txt file

User-agent: *
Disallow: /
`;

export function GET(): Response {
  return new Response(
    process.env["CONTEXT"] === "production" ? robotsTxtProd : robotsTextDev
  );
}
