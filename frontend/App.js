import { GluestackUIProvider, Text, Box, config } from "@gluestack-ui/themed"
import { StyleSheet, Text, View } from 'react-native';

export default function App() {
  return (
      <GluestackUIProvider config={config.theme}>
        <Box width="100%" justifyContent="center" alignItems="center">
          <Text>Open up App.js to start working on your app!</Text>
        </Box>
    </GluestackUIProvider>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
