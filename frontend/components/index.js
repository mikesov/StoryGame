import ScreenHeaderBtn from "./common/header/ScreenHeaderBtn";

// Home Screen
import Stories from './home/stories/Stories';

// Story Screen
import StoryView from "./home/stories/story/Story";

import { View,  ScrollView, SafeAreaView} from 'react-native';
import { Stack } from 'expo-router';

import { COLORS, icons, images, SIZES } from '../constants';
import Welcome from './home/welcome/Welcome';

const Home = () => {
  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: COLORS.lightWhite }}>
      {/* <Stack.Screen 
      options={{
        headerStyle: { backgroundColor: COLORS.lightWhite },
        headerShadowVisible: false,
        headerLeft: () => (
          <ScreenHeaderBtn iconUrl={icons.menu} dimension="60%"/>
        ),
        headerRight: () => (
          <ScreenHeaderBtn iconUrl={images.profile} dimension="60%"/>
        ),
        headerTitle: "",
      }}/> */}

      <ScrollView showsVerticalScrollIndicator={false}>
        <View
        style={{
          flex: 1,
          padding: SIZES.medium
        }}>
          <Welcome/>
          <Stories/>
        </View>
      </ScrollView>

    </SafeAreaView>
  );
}

export {
  ScreenHeaderBtn,
  Stories,
  StoryView,
  Home
};
