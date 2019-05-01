import queryString from 'querystring';
import overlayStyles from './overlay.json';

export default {
  getClient() {
    const host = 'webpack-hot-middleware/client?';
    const query = queryString.stringify({
      path: '/__webpack_hmr',
      timeout: 20000,
      reload: true,
      overlay: true,
      noInfo: true,
      overlayStyles: JSON.stringify(overlayStyles),
    });
    return `${host}${query}`;
  }
};
