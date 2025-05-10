import { deleteAsync } from "del";
import { bcpOutposts } from "@cyberfinity/event-horizon-site-meta";

const deletedPaths = await deleteAsync([bcpOutposts.distDir], { force: true });

console.log(`Deleted: \n${deletedPaths.join("\n")}`);
