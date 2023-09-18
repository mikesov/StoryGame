import { StyleSheet, Dimensions } from "react-native";

import { COLORS, FONT, SIZES } from "../../constants";

const { width, height } = Dimensions.get("window");

const styles = StyleSheet.create({
  playButton: {
    width: 100,
    height: 100,
    borderRadius: SIZES.medium,
    backgroundColor: COLORS.tertiary,
  },
  container: {
    flex: 1,
    alignItems: 'center',
    marginTop: SIZES.medium,
  },
  itemInfo: {
    fontSize: SIZES.large,
    margin: SIZES.large,
  },
  infoContainer: {
    alignContent: "center",
    justifyContent: "center",
  },
  playIcon: {
    width: 70,
    height: 70,
    margin: 15,
    resizeMode: 'cover',
  },
  item: (activeAudio, item) => ({
    width: width-(2*SIZES.medium),
    height: 100,
    marginBottom: SIZES.medium,
    borderRadius: SIZES.medium,
    borderWidth: 1,
    borderColor: activeAudio === item ? COLORS.secondary : COLORS.gray2,
  }),
});

export default styles;
