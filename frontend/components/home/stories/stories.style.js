import { StyleSheet } from "react-native";

import { COLORS, FONT, SIZES } from "../../../constants";

const styles = StyleSheet.create({
  list: {
    flexGrow: 0,
  },
  cardsContainer: {
    flex: 1,
    alignItems: 'center',
    marginTop: SIZES.xLarge,
  },
  coverImage: {
    width: 150,
    height: 150,
    position: "absolute",
    margin: 0,
    borderRadius: SIZES.medium,
  },
  favBtnImage: {
    width: 30,
    height: 30,
    tintColor: COLORS.tertiary,
  },
  card: (activeStory, item) => ({
    width: 150,
    height: 150,
    paddingVertical: SIZES.small / 2,
    paddingHorizontal: SIZES.small,
    borderRadius: SIZES.medium,
    borderWidth: 1,
    borderColor: activeStory === item ? COLORS.secondary : COLORS.gray2,
  }),
  cardTitle: (activeStory, item) => ({
    fontFamily: FONT.bold,
    fontSize: SIZES.large,
    textShadowColor: COLORS.black,
    textShadowOffset: {width: -1, height: 1},
    textShadowRadius: 10,
    color: activeStory === item ? COLORS.lightWhite : COLORS.white,
  }),
  cardSubtitle: (activeStory, item) => ({
    fontFamily: FONT.regular,
    fontSize: SIZES.medium,
    textShadowColor: COLORS.black,
    textShadowOffset: {width: -1, height: 1},
    textShadowRadius: 10,
    color: activeStory === item ? COLORS.lightWhite : COLORS.white,
  }),
  subtitleContainer: {
    flexDirection: "row",
    flexWrap: "wrap",
  },
  coins: {
    width: 20,
    height: 20,
  },
});

export default styles;
