import path from 'path';

export default (folder, prefix = '') => {
  const theme = path.basename(path.resolve('../'));
  return `${prefix}/wp-content/themes/${theme}/${folder}`;
};