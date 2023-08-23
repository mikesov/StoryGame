import { StyleSheet } from "react-native";

import { COLORS, FONT, SIZES } from "../../../constants";

const styles = StyleSheet.create({
  tabsContainer: {
    width: "100%",
    marginTop: SIZES.medium,
  },
  tab: (activeStory, item) => ({
    paddingVertical: SIZES.small / 2,
    paddingHorizontal: SIZES.small,
    borderRadius: SIZES.medium,
    borderWidth: 1,
    borderColor: activeStory === item ? COLORS.secondary : COLORS.gray2,
  }),
  tabTitle: (activeStory, item) => ({
    fontFamily: FONT.bold,
    fontSize: SIZES.large,
    color: activeStory === item ? COLORS.secondary : COLORS.gray,
  }),
  tabSubtitle: (activeStory, item) => ({
    fontFamily: FONT.regular,
    fontSize: SIZES.medium,
    color: activeStory === item ? COLORS.secondary : COLORS.gray2,
  }),
});

export default styles;
