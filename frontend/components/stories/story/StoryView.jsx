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

  const [pageFinish, setPageFinish] = useState(false);
  // const [sentenceWords, setSentenceWords] = useState([]);

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

  // useEffect(() => {
  //   try {
  //     let sentenceWordsRef = [];
  //     for (let i = 0; i < story.pages.sentences.length; i++) {
  //       let words = story.pages.sentences[i].words.filter(item => item.sentences[i].content.split(' ').includes(item.content));
  //       // console.log(sentenceWordsRef);
  //       words = words.sort((a, b) => {
  //         return a.order - b.order;
  //       });
  //       sentenceWordsRef.push(words);
  //     };
  //     setSentenceWords(sentenceWordsRef);
  //   } catch (error) {
  //     console.log("Error loading sentence words: " + error);
  //   }
  // }, []);

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
        disableGesture={!pageFinish}
        renderItem={({ item }) => (
          <Page item={item} setPageFinish={setPageFinish}/>
        )}
        index={0}
      />

    </SafeAreaView>
  )
}

export default StoryView;