import path from 'path';
import minimatch from 'minimatch';

export default class {
  constructor(options) {
    this.options = options;
  }
  apply(compiler) {
    const { context, extension, includeSubfolders } = this.options;
    compiler.hooks.emit.tapAsync('NonJsEntryCleanupPlugin', (compilation, callback) => {
      const pattern = path.join(context, `${includeSubfolders ? '**/' : ''}*.${extension}`);
      Object.keys(compilation.assets).filter(asset => minimatch(asset, pattern)).forEach(asset => delete compilation.assets[asset]);
      callback();
    });
  }
}
