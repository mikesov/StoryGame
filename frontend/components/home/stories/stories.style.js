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
    color: activeStory === item ? COLORS.secondary : COLORS.gray,
  }),
  cardSubtitle: (activeStory, item) => ({
    fontFamily: FONT.regular,
    fontSize: SIZES.medium,
    color: activeStory === item ? COLORS.secondary : COLORS.gray2,
  }),
});

export default styles;
