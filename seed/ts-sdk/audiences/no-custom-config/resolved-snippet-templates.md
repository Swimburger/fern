```typescript
import { SeedAudiencesClient } from "@fern/audiences";

const client = new SeedAudiencesClient({
  environment: SeedAudiencesEnvironment.EnvironmentA,
});
await client.folderA.service.getDirectThread();
 
```                        


```typescript
import { SeedAudiencesClient } from "@fern/audiences";

const client = new SeedAudiencesClient({
  environment: SeedAudiencesEnvironment.EnvironmentA,
});
await client.folderD.service.getDirectThread();
 
```                        


```typescript
import { SeedAudiencesClient } from "@fern/audiences";

const client = new SeedAudiencesClient({
  environment: SeedAudiencesEnvironment.EnvironmentA,
});
await client.foo.find({
  optionalString: "string",
  publicProperty: "string",
  privateProperty: 1,
});
 
```                        


