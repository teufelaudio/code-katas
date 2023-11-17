# Setup

## 1. Install node and npm

https://docs.npmjs.com/downloading-and-installing-node-js-and-npm

## 2. Install node packages

```bash
npm ci
```

## 3. Start the typescript watcher

```bash
cd <the directory containing the package.lock file>
    
npm run tsc:watch
```

## 4. Start the jest watcher

Open a new terminal window (we need to let the typescript watcher continue running in the previous window or tab)

```bash
cd <the directory containing the package.lock file>
    
npm run test:watch
```

## 5. Profit. 

When youy save any changes to your test or source files the tests will re-run