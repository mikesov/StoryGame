import { useCallback, useState, useRef, useEffect } from 'react';
import { View, Text, Dimensions, ScrollView, SafeAreaView, ActivityIndicator } from 'react-native';
import { Stack, useRouter, useGlobalSearchParams } from "expo-router";
import { SwiperFlatList } from 'react-native-swiper-flatlist';
import * as ScreenOrientation from 'expo-screen-orientation';

import { COLORS, icons, SIZES } from '../../../constants';
import { fetchStory } from '../../../hooks';
import styles from './storyView.style';
import Page from './page/Page';
import ScreenHeaderBtn from '../../common/header/ScreenHeaderBtn';

const StoryView = () => {
  const router = useRouter();
  const { width, height } = Dimensions.get("window");

  const swiperRef = useRef(null);

  const [currentIndex, setCurrentIndex] = useState(0);
  const [pageFinish, setPageFinish] = useState(false);

  useEffect(() => {
    if (swiperRef.current) {
      setCurrentIndex(swiperRef.current.getCurrentIndex());
    }
  }, []);

  const params = useGlobalSearchParams();

  const { story, isLoading, error } = fetchStory("stories", params.id);
  if (!story?.pages || story?.pages?.length <= 0) {
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
        <View style={styles.noPages}>
          <Text>No pages!</Text>
        </View>
      </SafeAreaView>
    );
  }
  // console.log(story.pages);

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
        ref={swiperRef}
        data={story.pages}
        disableGesture={!pageFinish}
        renderItem={({ item }) => (
          <Page item={item} setPageFinish={setPageFinish} currentIndex={currentIndex}/>
        )}
        index={0}
      />

    </SafeAreaView>
  )
}

export default StoryView;