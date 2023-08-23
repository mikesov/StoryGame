import { useState } from 'react';
import { 
  View,
  Text,
  TextInput,
  TouchableOpacity,
  Image,
  FlatList
} from 'react-native';
import { useRouter } from 'expo-router';

// import styles from './welcome.style';
import { icons, SIZES } from '../../../constants';
import styles from './stories.style';
import fetchStories from './fetchStories';

const Stories = () => {
  const router = useRouter();
  const { stories, isLoading, error } = fetchStories();
  const [activeStory, setActiveStory] = useState(null);

  return (
    <View style={styles.tabsContainer}>
      <FlatList
        data={stories}
        renderItem={({ item }) => (
          <TouchableOpacity
            style={styles.tab(activeStory, item)}
            onPress={() => {
              setActiveStory(item);
              router.push(`/stories/${item.id}`);
            }}
          >
            <Text style={styles.tabTitle}>{item.name}</Text>
            <Text style={styles.tabSubtitle}>{item.reward}</Text>
          </TouchableOpacity>
        )}
        numColumns={2}
      />
    </View>        
  );
};

export default Stories;