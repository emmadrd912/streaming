import Media from "./Media.js";
import Helpers from "../Helpers.js";

export default class Serie extends Media {
  constructor(data) {
    super(data);
    this.cacherPanneau("film");
  }

  remplir() {
    super.remplir();
    }
  }
}
