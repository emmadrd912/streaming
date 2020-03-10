import Media from "./Media.js";
import Helpers from "../Helpers.js";

export default class Film extends Media {
  constructor(data) {
    super(data);
    this.cacherPanneau("serie");
  }

  remplir() {
    super.remplir();
  }
}
