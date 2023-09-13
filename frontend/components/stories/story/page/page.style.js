import { StyleSheet } from "react-native";

import { COLORS, FONT, SIZES } from "../../../../constants";

const styles = StyleSheet.create({
  container: (width, height) => ({
    flex: 1,
    width: width,
    height: height,
    alignItems: 'center',
    justifyContent: 'center',
  }),
  backgroundImage: (width, height) =>  ({
    width: width,
    height: height,
  }),
});

export default styles;
