```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithCursorPagination({
  page: 1,
  perPage: 1,
  startingAfter: "string",
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithBodyCursorPagination({
  pagination: {
    cursor: "string",
  },
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithOffsetPagination({
  page: 1,
  perPage: 1,
  startingAfter: "string",
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithBodyOffsetPagination({
  pagination: {
    page: 1,
  },
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithOffsetStepPagination({
  page: 1,
  limit: 1,
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithOffsetPaginationHasNextPage({
  page: 1,
  limit: 1,
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithExtendedResults({
  cursor: "d5e9c84f-c2b2-4bf4-b4b0-7ffd7a9ffc32",
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithExtendedResultsAndOptionalData({
  cursor: "d5e9c84f-c2b2-4bf4-b4b0-7ffd7a9ffc32",
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listUsernames({
  startingAfter: "string",
});
 
```                        


```typescript
import { SeedPaginationClient } from "@fern/pagination";

const client = new SeedPaginationClient({
  environment: "YOUR_BASE_URL",
  token: "YOUR_TOKEN",
});
await client.users.listWithGlobalConfig({
  offset: 1,
});
 
```                        


