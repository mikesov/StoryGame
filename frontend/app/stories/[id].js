import { useCallback, useState } from 'react';
import { View, Text, SafeAreaView, ScrollView, ActivityIndicator, RefreshControl } from 'react-native';
import { Stack, useRouter, useGlobalSearchParams } from "expo-router";
import { useRoute } from "@react-navigation/native";
import { SwiperFlatList } from 'react-native-swiper-flatlist';

import { COLORS, icons, SIZES } from '../../constants';
import { fetchStory } from '../../hooks';

const Story = () => {
  const params = useGlobalSearchParams();
  const router = useRouter();
  const route = useRoute();

  const { story, isLoading, loading, error, refetch } = fetchStory("stories", params.id);
  const [currentScreen, setCurrentScreen] = useState(0);
  console.log(loading);
  // console.log(story.pages[0].id);
  return (
    <SafeAreaView>
      <Stack.Screen 
      options={{
        headerStyle: { backgroundColor: COLORS.lightWhite },
        headerShadowVisible: false,
        headerTitle: story.name,
      }}/>
      {loading && (<Text>{story.pages[0].id}</Text>)}
      
      {/* {story.pages.map((page) => {
          return <Text style={{ fontSize: 20 }}>{page.id}</Text>;
        })} */}
  {/* <SwiperFlatList
      autoplay
      autoplayDelay={2}
      autoplayLoop
      index={2}
      showPagination
      data={colors}
      renderItem={({ item }) => (
        <View style={[styles.child, { backgroundColor: item }]}>
          <Text style={styles.text}>{item}</Text>
        </View>
      )}
    /> */}
    </SafeAreaView>
  )
}

export default Story;