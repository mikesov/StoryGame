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

  const { story, isLoading, error, refetch } = fetchStory("stories", params.id);
  // console.log(story.pages[0].id);
  if (!story?.pages || story?.pages?.length <= 0) {
    return (
      <View>
        <Text>No pages!</Text>
      </View>
    );
  }
  console.log(story?.pages);
  return (
    <SafeAreaView>
      {/* <Stack.Screen 
        options={{
          headerStyle: { backgroundColor: COLORS.lightWhite },
          headerShadowVisible: false,
          headerTitle: story.name,
      }}/> */}
      <Text style={{paddingLeft:100}}>{story.pages[0].id}</Text>
      {/* {story.pages.map((page) => {
          return <Text style={{ fontSize: 20 }}>{page.id}</Text>;
        })} */}
      {/* <SwiperFlatList
        autoplay
        autoplayDelay={2}
        autoplayLoop
        index={2}
        showPagination
        data={story.pages}
        renderItem={({ item }) => (
        <View style={{marginTop:20}}>
          <Text style={{fontSize:20}}>{item.page_id}</Text>
        </View>
        )}
      /> */}
    </SafeAreaView>
  )
}

export default Story;