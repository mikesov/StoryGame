import { StyleSheet } from "react-native";
import { Dimensions } from "react-native";

import { COLORS, FONT, SIZES } from "../../../constants";

const styles = StyleSheet.create({
  headerButtonContainer: {
    alignSelf:'baseline',
    position: "absolute",
    margin: 0,
    top: 0,
    left: 0,
    zIndex: 3,
  },
});

export default styles;
