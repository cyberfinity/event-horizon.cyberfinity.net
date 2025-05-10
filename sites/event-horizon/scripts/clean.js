import { join } from "node:path";
import { deleteAsync } from "del";
import {
  eventHorizon,
  bcpOutposts,
} from "@cyberfinity/event-horizon-site-meta";

const deletedPaths = await deleteAsync(
  [
    join(eventHorizon.distDir, "**"),
    // exclude parent folders of sub-sites...
    `!${join(eventHorizon.distDir, "cargo_bay/")}`,
    // exclude sub-sites...
    `!${join(bcpOutposts.distDir, "**")}`,
  ],
  { force: true }
);

console.log(`Deleted: \n${deletedPaths.join("\n")}`);
