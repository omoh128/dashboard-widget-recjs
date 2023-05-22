import App from "./App";
import "./main.scss"
import { render } from '@wordpress/element';

/**
 * Import the stylesheet for the plugin.
 */


// Render the App component into the DOM
render(<App />, document.getElementById('root'));