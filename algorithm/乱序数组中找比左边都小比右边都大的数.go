//小于前面最小的 , 大于后面最大的      t 满足 arr[0...t-1]>arr[t]  arr[t+1...l]<arr[t]
// O(n^2)
//优化,存储 前n个数字最小的 , 后n个数字最大的 , 则第二次扫描只要一遍n+n=2n
func findPos(arr []int) int {
	l := len(arr) - 1
	for i := 0; i <= l; i++ {
		minLeft := arr[0]
		maxRight := arr[l]
		for j := 0; j <= l; j++ {
			if j < i {
				if arr[j] < minLeft {
					minLeft = arr[j]
				}

			}
			if j == i {
				continue
			}
			if j > i {
				if arr[j] > maxRight {
					maxRight = arr[j]
				}
			}

		}
		if arr[i] < minLeft && arr[i] > maxRight {
			return i
		}

	}
	return -1
}

func main() {
	arr := []int{3, 4, 2, 0, 1}
	fmt.Println(findPos(arr))
}