import { useCallback, useState } from 'react';
import { View, Text, Dimensions, ScrollView, SafeAreaView } from 'react-native';
import { Stack, useRouter, useGlobalSearchParams } from "expo-router";
import { SwiperFlatList } from 'react-native-swiper-flatlist';
import * as ScreenOrientation from 'expo-screen-orientation';

import { COLORS, icons, SIZES } from '../../../constants';
import { fetchStory } from '../../../hooks';
import styles from './storyView.style';
import Page from './page/Page';
import ScreenHeaderBtn from '../../common/header/ScreenHeaderBtn';

const StoryView = () => {
  const { width, height } = Dimensions.get("window");

  const [pageActive, setPageActive] = useState(0);

  const router = useRouter();

  const params = useGlobalSearchParams();

  const { story, isLoading, error } = fetchStory("stories", params.id);
  if (!story?.pages || story?.pages?.length <= 0) {
    return (
      <View>
        <Text>No pages!</Text>
      </View>
    );
  }
  // console.log(story.pages);

  

  const onChange = (nativeEvent) => {
    if (nativeEvent) {
      const slide = Math.ceil(nativeEvent.contentOffset.x / nativeEvent.LayoutMeasurement.width);
      if (slide != pageActive) {
        setPageActive(slide);
      }
    }
  }

  return (
    <SafeAreaView>
      <Stack.Screen
        options={{
          headerShown: false
        }}
      />

      <View style={styles.headerButtonContainer}>
        <ScreenHeaderBtn 
          iconUrl={icons.chevronLeft} 
          dimension="60%"
          handlePress={() => {
            ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.PORTRAIT_UP);
            router.back();
          }}
        />
      </View>

      <SwiperFlatList
        data={story.pages}
        renderItem={({ item }) => (
          <Page item={item}/>
        )}
      />

    </SafeAreaView>
  )
}

export default StoryView;